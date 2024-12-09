<header>
    <div class="logo">
        <img src="{{asset('images/logo1.png') }}" alt="Your Logo">
    </div>
    <nav>
        <ul>
            <li><a href="{{ route('welcome') }}">Home</a></li>
            <li>
                <a href="#">Services</a>
                <ul class="dropdown">
                    <li><a href="{{ route('DestinationWedding') }}">Destination Wedding</a></li>
                    <li><a href="{{ route('TraditionalWedding') }}">Traditional Wedding</a></li>
                    <li><a href="#">Birthday Party</a></li>
                </ul>
            </li>
            <li><a href="{{ route('menu') }}">Menus</a></li>
            <li><a href="{{ route('events') }}">Events</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>

        </ul>
        <div class="search-container">
    <form action="{{ route('events.search') }}" method="GET">
        <input type="text" placeholder="Search..." name="query" value="{{ request()->query('query') }}">
        <button type="submit">🔍</button>
    </form>
</div>


        
    </div>
    </nav>
</header>
