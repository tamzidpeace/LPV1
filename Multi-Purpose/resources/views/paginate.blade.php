<table class="table table-bordered">
    <thead>
        <tr>
            <td scope="col">#</td>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>

            <th>Manage</th>
        </tr>

    </thead>
    <tbody id="customer-tbody">
        @php
        $i = 1;
        @endphp
        @foreach ($customers as $item)
        <tr>
            <td scope="row">{{ $i++ }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->email }}</td>

            <td>
                <a data-toggle="modal" data-target="#show-customer" onclick="view({{ $item->id }})"  id="view"
                    class="btn btn-outline-primary" href="">View</a>
                   <a data-toggle="modal" data-target="#editCustomer" onclick="edit({{ $item->id }})"
                   class="btn btn-outline-warning" href="">Edit</a>
                   <a onclick="destroy({{ $item->id }})" class="btn btn-outline-danger" href="">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<br>
{{ $customers->links() }}