@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="css/Adminpanel/table.css">

<!-- !PAGE CONTENT! -->

<!-- Custom Table -->
<div class="table-responsive">
    <h2 class="order-list-headings"><span>CHART</span>LIST</h2>
    <div class="new-div">
        <button onclick="document.location='/add-chart'">ADD NEW CHART</button>
     </div>
    <table id="customTable">
        <thead>
            <tr>
                <th>Chart Size Id</th>
                <th>Chart Size Title</th>
                <th>Chart Size Image</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($charts as $char)
            <tr>
                <td>{{ $char->id }}</td>
                <td>{{ $char->chart_title }}</td>
                <td>
                    <img src="{{ asset('storage/app/public/chartassets/' . $char->chart_image) }}" alt="Banner Image" width="100">
                </td>
                <td>
                    <a href="{{ url('/chartdeleted/' . $char->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>          </td>
                </td>
                <td>
               <a href="/chartedit/{{ $char->id }}" class="btn btn-success"><i class="fa-solid fa-trash"></i> Update</a>
               </td>

                </tr>
          @endforeach

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
