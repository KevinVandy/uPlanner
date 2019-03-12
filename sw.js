const staticAssets = [
  '/manifest.webmanifest',
  '/home.php',
  '/offline.html',
  '/app.min.js',
  '/js/jquery-3.3.1.min.js',
  '/js/moment.min.js',
  '/js/add-course.min.js',
  '/js/add-event.min.js',
  '/js/add-homework.min.js',
  '/js/add-job.min.js',
  '/js/add-meeting.min.js',
  '/js/add-reminder.min.js',
  '/js/add-task.min.js',
  '/js/add-work.min.js',
  '/js/calendar.min.js',
  '/js/items.min.js',
  '/js/navbar-bottom.min.js',
  '/js/navbar-hidden.min.js',
  '/js/navbar-top.min.js',
  '/js/settings.min.js',
  '/css/calendar.min.css',
  '/css/items.min.css',
  '/css/main.min.css',
  '/css/navbar.min.css',
  '/css/normalize.min.css',
  '/css/popupform.min.css',
  '/images/profile.jpg',
  '/images/uplanner.png'
];

const cacheName = "static";

self.addEventListener('install', function (event) {
  event.waitUntil(
    caches.open(cacheName).then(function (cache) {
      return cache.addAll(staticAssets);
    })
  );
});

self.addEventListener('activate', e => {
  console.log('Service Worker: Activated');
  e.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cache => {
          if (cache !== cacheName) {
            return caches.delete(cache);
          }
        })
      );
    })
  );
});

self.addEventListener('fetch', event => {
  const request = event.request;
  const url = new URL(request.url);
  if (url.origin == location.origin) {
    try {
      event.respondWith(networkFirst(request));
    } catch (err) {
      event.respondWith(cacheFirst(request));
    }
  } else {
    try {
      event.respondWith(cacheFirst(request));
    } catch (err) {
      event.respondWith(networkFirst(request));
    }
  }
});

async function cacheFirst(request) {
  const cachedResponse = await caches.match(request);
  return cachedResponse || fetch(request);
}

async function networkFirst(request) {
  const cache = await caches.open('static');
  try {
    const res = await fetch(request);
    cache.put(request, res.clone());
    return res;
  } catch (error) {
    const cachedResponse = await cache.match(request);
    return cachedResponse || await caches.match('/offline.html');
  }
}
