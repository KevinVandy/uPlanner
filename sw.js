const staticAssets = [
    './images/profile.jpg',
    './favicon.ico',
    './manifest.json',
    './home.php',
    './app.min.js',
    './sw.min.css',
    './js/jquery-3.3.1.min.js',
    './js/add-course.min.js',
    './js/add-event.min.js',
    './js/add-homework.min.js',
    './js/add-job.min.js',
    './js/add-meeting.min.js',
    './js/add-reminder.min.js',
    './js/add-task.min.js',
    './js/add-work.min.js',
    './js/calendar.min.js',
    './js/login.min.js',
    './js/navbar-bottom.min.js',
    './js/navbar-hidden.min.js',
    './js/navbar-top.min.js',
    './js/settings.min.js',
    './css/normalize.min.css',
    './css/main.min.css',
    './css/navbar.min.css',
    './css/popupform.min.css',
    './css/login.min.css',
    './css/calendar.min.css'
];

self.addEventListener('install', async event => {
    const cache = await caches.open('static');
    cache.addAll(staticAssets); 
    console.log('Static Assets added to cache');
});

self.addEventListener('fetch', event => {
    const request = event.request;
    const url = new URL(request.url);

    if(url.origin == location.origin) {
        event.respondWith(cacheFirst(request));
    } else{
        event.respondWith(networkFirst(request))
    }
});

async function cacheFirst(request){
    const cachedResponse = await caches.match(request);
    console.log('Loaded from cache');
    return cachedResponse || fetch(request);
}

async function networkFirst(request){
    const cache = await caches.open('static');
    try{
        const res = await fetch(request);
        cache.put(request, res.clone());
        return res;
    } catch(error){
        const cachedResponse = await cache.match(request);
        return cachedResponse || await caches.match('home.php');
    }
}