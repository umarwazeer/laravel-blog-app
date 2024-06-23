<template>
    <div>
        <section class="navigation">
  <div class="nav-container">
    <div class="brand">
      <a href="#!">Latest Blog</a>
    </div>
    <nav>
      <div class="nav-mobile"><a id="navbar-toggle" href="#!"><span></span></a></div>
      <ul class="nav-list">
        <li>
            <router-link to="/">Blogs</router-link>
        </li>
        <li>
            <router-link to="/post">Post Blog</router-link>
        </li>
        <li>
          <a href="#!">Portfolio</a>
        </li>
        <li>
          <a href="#!">Contact</a>
        </li>
      </ul>
    </nav>
  </div>
</section>

      <!-- <navbar>
        <router-link to="/">Home</router-link>
        <router-link to="/post">Post Blog</router-link>
      </navbar> -->
      <router-view></router-view>
    </div>
  </template>

  <script>
  export default {
    name: 'Home',
  };
  </script>

<style>

body{
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #E6E9F3;
}
.navigation {
    /* height: 60px; */
    padding: 0px 0px 60px 0px;
    background: linear-gradient(45deg, #20a1c2, #0d98aa);
}
.brand {
    position: absolute;
    padding-left: 20px;
    float: left;
    line-height: 55px;
    text-transform: uppercase;
    font-size: 1.4em;
}
.brand a, .brand a:visited {
    text-transform: capitalize;
    color: #ffffff;
    text-decoration: none;
}
.nav-container {
    max-width: 1000px;
    margin: 0 auto;
}
nav {
    float: right;
}
nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
}
nav ul li {
    float: left;
    position: relative;
}
nav ul li a,nav ul li a:visited {
    display: block;
    padding: 0 20px;
    line-height: 55px;
    color: #fff;
    background: #262626 ;
    text-decoration: none;
}
nav ul li a{
    background: transparent;
    color: #FFF;
}
nav ul li a:hover, nav ul li a:visited:hover {
    background: #2581DC;
    color: #ffffff;
}
.navbar-dropdown li a{
    background: #2581DC;
}
nav ul li a:not(:only-child):after, nav ul li a:visited:not(:only-child):after {
    padding-left: 4px;
    content: ' \025BE';
}
nav ul li ul li {
    min-width: 190px;
}
nav ul li ul li a {
    padding: 15px;
    line-height: 20px;
}
.navbar-dropdown {
    position: absolute;
    display: none;
    z-index: 1;
    background: #fff;
    box-shadow: 0 0 35px 0 rgba(0,0,0,0.25);
}
/* Mobile navigation */
.nav-mobile {
    display: none;
    position: absolute;
    top: 0;
    right: 0;
    background: transparent;
    height: 55px;
    width: 70px;
}

</style>
