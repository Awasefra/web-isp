
    <header class="header" id="header">
        <div class="header_toggle"> 
            <i class="bi bi-list" id="header-toggle"></i> 
        </div>
        <div> 
            <i class="bi bi-person"></i> 
            {{auth()->user()->username}}
        </div>
        </header>
        <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            @if ((auth()->user()->role == 0))
            <div> 
                <a href="#" class="nav_logo"> 
                    <i class="bi bi-layers nav_logo-icon"></i> 
                    <span class="nav_logo-name">ISP</span> 
                </a>
            <div class="nav_list" id="nav_list">
                @if($title == 'dashboard') 
                <a href="{{route('dashboard')}}" class="nav_link active"> 
                @else
                <a href="{{route('dashboard')}}" class="nav_link"> 
                    @endif
                <i class="bi bi-grid-1x2-fill nav_icon"></i> 
                    <span class="nav_name">Dashboard</span> 
                </a> 
           
                @if($title == 'paket') 
                <a href="{{route('paket')}}" class="nav_link active"> 
                    @else
                    <a href="{{route('paket')}}" class="nav_link"> 
                        @endif

                    <i class="bi bi-folder nav_icon"></i> 
                    <span class="nav_name">Paket</span> 
                </a> 
                @if($title == 'laporan') 
                <a href="{{route('laporan')}}" class="nav_link active"> 
                    @else
                    <a href="{{route('laporan')}}" class="nav_link"> 
                        @endif

                    <i class="bi bi-pass nav_icon"></i> 
                    <span class="nav_name">Laporan</span> 
                </a> 
                @if($title == 'sales')
                <a href="{{route('sales')}}" class="nav_link active">
                    @else 
                <a href="{{route('sales')}}" class="nav_link"> 
                    @endif
                    <i class="bi bi-person nav_icon"></i> 
                    <span class="nav_name">Sales</span> 
                </a>
            
                
                
            </div> 
            @else
            <div> 
                <a href="#" class="nav_logo"> 
                    <i class="bi bi-layers nav_logo-icon"></i> 
                    <span class="nav_logo-name">ISP</span> 
                </a>
            <div class="nav_list" id="nav_list">
                @if($title == 'dashboard') 
                <a href="{{route('dashboard')}}" class="nav_link active"> 
                @else
                <a href="{{route('dashboard')}}" class="nav_link"> 
                    @endif
                <i class="bi bi-grid-1x2-fill nav_icon"></i> 
                    <span class="nav_name">Dashboard</span> 
                </a> 
           
                @if($title == 'customer') 
                <a href="{{route('customer')}}" class="nav_link active"> 
                    @else
                    <a href="{{route('customer')}}" class="nav_link"> 
                        @endif

                    <i class="bi bi-file-earmark-person nav_icon"></i> 
                    <span class="nav_name">Customer</span> 
                </a> 
                
                @if($title == 'sales')
                <a href="{{'password_update'}}" class="nav_link active">
                    @else 
                <a href="{{'password_update'}}" class="nav_link"> 
                    @endif
                    <i class="bi bi-person nav_icon"></i> 
                    <span class="nav_name">Sales</span> 
                </a>
            </div>
            @endif
        
            </div>
    <form action="{{ route('logout') }}" method="post" id="logout-form" >
        @csrf
        <a class="nav_link" >
            <button style="border: none; background: none; padding: none; color:white">
            <i class="bi bi-box-arrow-in-left nav_icon"></i> 
            <span class="nav_name">SignOut</span> 
        </button>
        </a>
        
    </form>
        </nav>
        </div>
        


