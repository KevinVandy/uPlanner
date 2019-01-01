var uplannerDB = (function () {
    var uDB = {};
    var datastore = null;

    /**
     * Open a connection to the datastore.
     */
    uDB.open = function (callback) {
        // Database version.
        var version = 1;

        // Open a connection to the datastore.
        var request = indexedDB.open('events', version);

        // Handle datastore upgrades.
        request.onupgradeneeded = function (e) {
            var db = e.target.result;

            e.target.transaction.onerror = uDB.onerror;

            // Delete the old datastore.
            if (db.objectStoreNames.contains('event')) {
                db.deleteObjectStore('event');
            }

            // Create a new datastore.
            var store = db.createObjectStore('event', {
                keyPath: 'timestamp'
            });
        };

        // Handle successful datastore access.
        request.onsuccess = function (e) {
            // Get a reference to the DB.
            datastore = e.target.result;

            // Execute the callback.
            callback();
        };

        // Handle errors when opening the datastore.
        request.onerror = uDB.onerror;
    };

    /**
     * Fetch all of the event items in the datastore.
     */
    uDB.fetchevents = function (callback) {
        var db = datastore;
        var transaction = db.transaction(['event'], 'readwrite');
        var objStore = transaction.objectStore('event');

        var keyRange = IDBKeyRange.lowerBound(0);
        var cursorRequest = objStore.openCursor(keyRange);

        var events = [];

        transaction.oncomplete = function (e) {
            // Execute the callback function.
            callback(events);
        };

        cursorRequest.onsuccess = function (e) {
            var result = e.target.result;

            if (!!result == false) {
                return;
            }

            events.push(result.value);

            result.continue();
        };

        cursorRequest.onerror = uDB.onerror;
    };

    /**
     * Create a new event item.
     */
    uDB.createevent = function (event, callback) {
        // Get a reference to the db.
        var db = datastore;

        // Initiate a new transaction.
        var transaction = db.transaction(['event'], 'readwrite');

        // Get the datastore.
        var objStore = transaction.objectStore('event');

        // Create a timestamp for the event item.
        var timestamp = new Date().getTime();

        // Create the datastore request.
        var request = objStore.put(event);

        // Handle a successful datastore put.
        request.onsuccess = function (e) {
            // Execute the callback function.
            callback(event);
        };

        // Handle errors.
        request.onerror = uDB.onerror;
    };

    /**
     * Delete a event item.
     */
    uDB.deleteevent = function (id, callback) {
        var db = datastore;
        var transaction = db.transaction(['event'], 'readwrite');
        var objStore = transaction.objectStore('event');

        var request = objStore.delete(id);

        request.onsuccess = function (e) {
            callback();
        }

        request.onerror = function (e) {
            console.log(e);
        }
    };
    
    // Export the uDB object.
    return uDB;
}());