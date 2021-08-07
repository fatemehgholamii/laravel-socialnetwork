<header dir="rtl">
 
    <nav class="navbar-light bg-light navbar navbar-expand-lg ">
      <div id="main-nav" class="navbar navbar-expand-md ">
        <div class="container-fluid">
          <div class="navbar-header">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
          </button>
          <a  class="navbar-brand" href="{{ route('dashboard') }}">گروه جهادی میثاق</a>
          </div>
          
          <div class="navbar navbar-expand-md " id="bs-example-navbar-collapse-1">
            <ul  class="nav navbar-nav navbar-right">
              <li><a  href="{{ route('account') }}">   Account    </a></li>
            </ul>
        </div>
        <div class="navbar navbar-expand-md " id="bs-example-navbar-collapse-1">
          <ul  class="nav navbar-nav navbar-right">
            <li><a  href="{{ route('logout') }}">    Logout    </a></li>
          </ul>
      </div>
      
      </div>
        </div>
      </nav>
</header>