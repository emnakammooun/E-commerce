<template>
    <head>
        <meta charset="utf-8">
        <title>E-commerce</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Templates" name="description">
    
    </head>
    
    <body>
        <Topbar />
        <Navbar />
        <slot />
    
        <Footer />
    
        <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    
    
    
    </body>
    </template>
    <script>
        import Footer from './Site/Footer.vue';
        import Navbar from './Site/Navbar.vue';
        import Topbar from './Site/Topbar.vue';

        export default {
    components: { Footer,Navbar,Topbar },
};
</script>
