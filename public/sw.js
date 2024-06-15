const CACHE_NAME = "offline-v1";
const filesToCache = [
    "/",
    "/menu",
    "/orders",
    "/user/profile",
    "/cart",
    "/order/create",
];

const preLoad = function () {
    return caches.open(CACHE_NAME).then(function (cache) {
        return cache.addAll(filesToCache);
    });
};

self.addEventListener("install", function (event) {
    event.waitUntil(preLoad());
});

const checkResponse = function (request) {
    return fetch(request).then(function (response) {
        if (response.status !== 404) {
            return response;
        } else {
            return Promise.reject("not-found");
        }
    });
};

const addToCache = function (request) {
    return caches.open(CACHE_NAME).then(function (cache) {
        return fetch(request).then(function (response) {
            return cache.put(request, response.clone()).then(function () {
                return response;
            });
        });
    });
};

const returnFromCache = function (request) {
    return caches.open(CACHE_NAME).then(function (cache) {
        return cache.match(request).then(function (matching) {
            if (!matching || matching.status === 404) {
                return cache.match("/");
            } else {
                return matching;
            }
        });
    });
};

self.addEventListener("fetch", function (event) {
    event.respondWith(
        checkResponse(event.request).catch(function () {
            return returnFromCache(event.request);
        })
    );

    if (
        event.request.method === "GET" &&
        event.request.url.startsWith(self.location.origin)
    ) {
        event.waitUntil(addToCache(event.request));
    }
});

self.addEventListener("activate", function (event) {
    const cacheWhitelist = [CACHE_NAME];
    event.waitUntil(
        caches.keys().then(function (cacheNames) {
            return Promise.all(
                cacheNames.map(function (cacheName) {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});
