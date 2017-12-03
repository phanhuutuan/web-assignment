    <div id='wrapper'>
      <div id='main-nav-bg'></div>
      <nav class='main-nav-fixed' id='main-nav'>
        <div class='navigation'>
          <div class='search'>
            <form action='search_results.html' method='get'>
              <div class='search-wrapper'>
                <input value="" class="search-query form-control" placeholder="Search..." autocomplete="off" name="q" type="text" />
                <button class='btn btn-link icon-search' name='button' type='submit'></button>
              </div>
            </form>
          </div>
          <ul class='nav nav-stacked'>
            <li class=''>
              <a href='admin.php?c=member'>
                <i class='icon-user'></i>
                <span>Users</span>
              </a>
            </li>
          </ul>
          <ul class='nav nav-stacked'>
            <li class=''>
              <a href='admin.php?c=product'>
                <i class='icon-gift'></i>
                <span>Products</span>
              </a>
            </li>
          </ul>
            <ul class='nav nav-stacked'>
            <li class=''>
              <a href='admin.php?c=news'>
                <i class='icon-info'></i>
                <span>News</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>