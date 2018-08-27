@if (session()->has('message'))
    <div class="flash-message">
        <ul class="list-group">
            <li class="list-group-item list-group-item-success">
                {{ session()->get('message') }}
            </li>
        </ul>
    </div>
@endif
