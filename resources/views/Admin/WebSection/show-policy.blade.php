@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/Adminpanel/admin-policy.css">

<div class="new-div">
    <button onclick="document.location='/add-policy'">ADD NEW POLICY</button>
 </div> 
<div class="main-policy" style="display:flex; justify-content:center; align-items: center;">
    <div class="container-fluid" style="width: 80%; box-shadow: 1px 1px 15px rgb(180, 180, 180); border-radius: 20px; margin-top: 30px;">
        <ol class="policy-list">
            @foreach ($policies as $policy)
                <li>{{ $policy->policytitle }}</li>
                <p>{{ $policy->policytxt }}</p>
                <div>
                    <a href="/policyedit/{{ $policy->id }}" class="btn btn-success">Update</a>

                    <a href="/policydeleted/{{ $policy->id }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                </div>
            @endforeach
        </ol>
    </div>
</div>

<script>
    // JavaScript to show the modal on icon click
    document.getElementById('edit-icon').addEventListener('click', function() {
        document.getElementById('modal').style.display = 'block';
    });

    // JavaScript to close the modal
    document.getElementById('close-modal').addEventListener('click', function() {
        document.getElementById('modal').style.display = 'none';
    });

    // Close modal when clicking outside of it
    window.onclick = function(event) {
        var modal = document.getElementById('modal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>
@endsection
