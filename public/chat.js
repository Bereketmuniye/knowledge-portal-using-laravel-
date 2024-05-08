import Echo from "laravel-echo";
window.Echo = new Echo
({
    broadcaster:'pusher',
    key:process.env.MAX_PUSHER_APP_KEY,
    cluster:process.env.MAX_PUSHER_APP_CLUSTER,
    encrypted:true
})
