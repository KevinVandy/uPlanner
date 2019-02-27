const staticAssets = [
    './index.php',
    './home.php',
    './app.js',
    './js/jquery-3.3.1.min.js',
    './js/db.min.js',
    './js/navbar-top.min.js',
    './js/navbar-hidden.min.js',
    './js/navbar-bottom.min.js',
    './css/normalize.min.css',
    './css/main.min.css',
    './css/navbar.min.css',
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