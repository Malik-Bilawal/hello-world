@extends('WEBSITE.Components')

@section('web-components')
<link rel="stylesheet" href="css/WEBSITE/policy.css">

<div class="header-container">
    <h1>Privacy & Policy</h1>
  </div>

  <div class="container-fluid">
    <ol class="policy-list">
      @foreach ( $policy as $poli)
      <li>{{ $poli->policytitle }}</li>
      <P>{{ $poli->policytxt }}</P>
      @endforeach
    </ol>
  </div>
@endsection
