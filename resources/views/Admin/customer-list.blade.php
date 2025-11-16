@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="css/Adminpanel/table.css">

<!-- !PAGE CONTENT! -->

<!-- Custom Table -->
<div class="table-responsive">
    <h2 class="order-list-headings"><span>REGISTERED CUSTOMER</span> LIST</h2>
    <table id="customTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>CUS Name</th>
                <th>CUS Email</th>
                <th>Role</th>
                <th>CUS REGISTERED</th>
            </tr>
        </thead>
        <tbody>
            <!-- Static Data Rows -->
            @foreach ($customer as $cust )
            <tr>
                <td>{{$cust->id}}</td>
                <td>{{$cust->name}}</td>
                <td>{{$cust->email}}</td>
                <td>{{$cust->role}}</td>
                <td>{{$cust->created_at}}</td>
            </tr>
            @endforeach
            <!-- Add more rows as needed -->
        </tbody>
    </table>
    <div id="pagination"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const table = document.getElementById('customTable');
        const rows = table.querySelectorAll('tbody tr');
        const pagination = document.getElementById('pagination');
        const rowsPerPage = 5;
        let currentPage = 1;

        function displayTable(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            rows.forEach((row, index) => {
                row.style.display = index >= start && index < end ? '' : 'none';
            });

            updatePagination();
        }

        function updatePagination() {
            const totalPages = Math.ceil(rows.length / rowsPerPage);
            pagination.innerHTML = '';

            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.addEventListener('click', () => {
                    currentPage = i;
                    displayTable(currentPage);
                });
                if (i === currentPage) {
                    button.classList.add('active');
                }
                pagination.appendChild(button);
            }
        }

        table.querySelectorAll('th').forEach((header, index) => {
            header.addEventListener('click', () => {
                sortTable(index);
            });
        });

        function sortTable(column) {
            const sortedRows = Array.from(rows).sort((a, b) => {
                const cellA = a.cells[column].textContent.trim();
                const cellB = b.cells[column].textContent.trim();
                return cellA.localeCompare(cellB, undefined, { numeric: true });
            });

            sortedRows.forEach(row => table.querySelector('tbody').appendChild(row));
            displayTable(currentPage);
        }

        displayTable(currentPage);
    });
</script>
@endsection
