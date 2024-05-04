<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
      <a class="navbar-brand" href="home.html">WebShop</a>
      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
    <!-- left side navbar -->
          <div class="navbar-nav">
        <!-- always available -->
            <li class="nav-item">
                <a class="nav-link" href="products.html">Products</a>
            </li>
            <li>
                <a class="nav-link" href="coupons.html">Coupons</a>
            </li>
        <!-- user is logged in -->
          <?php if (isset($_SESSION["username"]) || isset($_COOKIE["username"])): ?>
            <li class="nav-item">
              <a class="nav-link" href="orders.html">Orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="invoices.html">Invoices</a>
            </li>
            <?php if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"]): ?>
              <li class="nav-item admin-only">
                <a class="nav-link" href="editproducts.html"><b>Edit Products</b></a>
              </li>
              <li class="nav-item admin-only">
                <a class="nav-link" href="editcustomers.html"><b>Manage Customers</b></a>
              </li>
              <li class="nav-item admin-only">
                <a class="nav-link" href="editcoupons.html"><b>Manage Coupons</b></a>
              </li>
            <?php endif; ?>
          <?php endif; ?>
          </div>
    <!-- right side navbar -->
          <div class="navbar-nav">
            <li class="nav-item align-self-center">
                <form class="form-inline d-flex">
                    <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit" style="margin-left: 5px;">Search</button>
                </form>
            </li>
        <!-- user is not logged in -->
        <?php if (!isset($_SESSION["username"]) && !isset($_COOKIE["username"])): ?>
            <li class="nav-item">
                <a class="nav-link" href="login.html">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.html">Register</a>
            </li>
          <?php endif; ?>
        <!-- user is logged in -->
          <?php if (isset($_SESSION["username"]) || isset($_COOKIE["username"])): ?>
            <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault(); logout();">Logout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="account.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm7.753 18.305c-.261-.586-.789-.991-1.871-1.241-2.293-.529-4.428-.993-3.393-2.945 3.145-5.942.833-9.119-2.489-9.119-3.388 0-5.644 3.299-2.489 9.119 1.066 1.964-1.148 2.427-3.393 2.945-1.084.25-1.608.658-1.867 1.246-1.405-1.723-2.251-3.919-2.251-6.31 0-5.514 4.486-10 10-10s10 4.486 10 10c0 2.389-.845 4.583-2.247 6.305z"/></svg>
              </a>
            </li>
          <?php endif; ?>
        <!-- always available -->
          <li class="nav-item">
              <a class="nav-link" href="bag.html">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z"/></svg>
              </a>
          </li>
          </div>
      </div>
  </div>
</nav>