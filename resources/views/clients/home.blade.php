<link rel="stylesheet" href="../../css/header.css">
<style>
    body {
        background-image: url('https://img.thuthuatphanmem.vn/uploads/2018/09/27/wallpaper-4k_105912678.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;

    }
</style>

@include('clients.header')

<body>
<marquee direction="right" width="50%"><h2>Hello {{!empty(session('profile')[0]['first_name'] . ' '.session('profile')[0]['last_name']) ? (session('profile')[0]['first_name'] . ' '.session('profile')[0]['last_name']) : ""}} !!! </h2><marquee>

</body>

</html>