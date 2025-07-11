@guest
    <!-- Navigation for Guest Users -->
<nav class="navbar">
    <div class="logo">Blog</div>
        <div class="nav-links"> 
            <a href="{{ route('home') }}" class="nav-link @if(request()->route()->getName() === 'home') active @endif">Home</a>
            <a href="{{ route('blog.index') }}" 
            class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">
            Blog
            </a>

            <a href="{{ route('about') }}" class="nav-link @if(request()->route()->getName() === 'about') active @endif">About</a>
            <a href="{{ route('contact') }}" class="nav-link @if(request()->route()->getName() === 'contact') active @endif">Contact</a>  
            <a href="{{ route('login.show') }}" class="nav-btn" onclick="showLogin()">Login</a>
            <a href="{{ route('signup.show') }}" class="nav-btn" onclick="showSignup()">Sign Up</a>
        </div>
    </div>
</nav>   
@endguest

@auth
    <!-- Navigation for Authenticated Users -->
<nav class="navbar">
    <div class="logo">Blog</div>
        <div class="nav-links"> 
            <a href="{{ route('dashboard') }}" 
                @if(request()->route()->getName() === 'dashboard')
                    class="nav-link active"
                @else
                    class="nav-link"
                @endif >Dashboard</a>
            <a href="{{ route('posts.index') }}" 
                @if(request()->routeIs('posts.*' ))
                    class="nav-link active"
                @else
                    class="nav-link"
                @endif >Posts</a>
            <a href="{{ route('categories.index') }}"
                @if(request()->routeIs('categories.*'))
                    class="nav-link active"
                @else
                    class="nav-link"
                @endif >Categories</a>
            <a href="{{ route('tags.index') }}"
                @if(request()->routeIs('tags.*'))
                    class="nav-link active"
                @else
                    class="nav-link"
                @endif >Tags</a>
                
            <div class="nav-link">
                Welcome, <span>{{ auth()->user()->name }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-btn">Logout</button>
            </form>            
        </div>
    </div>
</nav>
@endauth