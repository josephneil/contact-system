<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function searchContacts() {
            var search = document.getElementById('search').value;
            $.ajax({
                type: 'GET',
                url: "{{ route('contacts.search') }}",
                data: { search: search },
                success: function(response) {
                    $('#contacts-list').html(response);
                }
            });
        }
    </script>
</head>
<body>
    @if (Auth::check())
        <h1>Contacts</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <a href="{{ route('create.contact') }}">Add Contact</a>
        <input type="text" id="search" onkeyup="searchContacts()" placeholder="Search contacts">
        <div id="contacts-list"></div>
    @else
        <p>Please <a href="{{ route('login') }}">login</a> to view contacts.</p>
    @endif
</body>
</html>
