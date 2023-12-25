

@section('title', 'Dashboard')
<h1>Dashboard</h1>
@section('content')
    <h2>Store FAQ</h2>
@endsection

<h5>App Menu</h5>
<p>Groups</p>
<ul>
    <li><a href="{{URL::tokenRoute('group.index')}}">All Group</a></li>
    <li><a href="#">Create</a></li>
</ul>
<p>Faq</p>
<ul>
    <li><a href="#">All Faq</a></li>
    <li><a href="#">Create</a></li>
</ul>

@section('scripts')
    @parent


@endsection
