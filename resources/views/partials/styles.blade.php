<!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!-- CSS Datatables Export Buttons-->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Trix Editor CSS -->
<link href="/css/trix.css" rel="stylesheet">
{{--  <!-- Tagify CSS -->
<link href="/css/tagify.css" rel="stylesheet">
  --}}



<style>
  #postCategories_processing{
    border:none;
  }
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .input-borderless {
    background: rgba(0, 0, 0, 0);
    border: none;
    border-style: none;
    width: -webkit-fill-available;
  }
  .input-borderless:focus {
    outline: none;
  }
  .overflow-x-0{
    overflow-x: hidden; /* Hide horizontal scrollbar */
  }

  .modal-content {
    text-decoration: none !important;
  }
  .selected-tr {
    background-color: gray;
  }
</style>

<style>
    .tt-menu.tt-open {
        max-height: 150px !important;
        overflow-y: auto;
      }
</style>


<!-- Custom styles for this template -->
<link href="/css/dashboard.css" rel="stylesheet">

<style>
    trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
    }
    .size-18 { width: 16px; height: 16px; }
</style>

<style>
    .tagify__input{
        min-width: 200px;
    }
</style>
<style>
    .select2-selection__rendered{
        min-width: 100px;
    }

    .select2-container .select2-selection--single {
        height: 36px !important;
        padding-top: 2px;
    }

</style>
