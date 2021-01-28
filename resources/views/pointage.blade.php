<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">


<table class="table" id="table">
    <thead>
        <tr>
            <th class="text-center">Matricule</th>
            <th class="text-center">Nom Prénom</th>
            <th class="text-center">Date</th>
            <th class="text-center">Entrée</th>
            <th class="text-center">Sortie</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr class="item{{$item->MATRIC}}">
            <td>{{$item->MATRIC}}</td>
            <td>{{$item->NOM}} {{$item->PRE}}</td>
            <td>{{$item->date}}</td>
            <td>{{$item->ENTRANCE}}</td>
            <td>{{$item->Exit}}</td>
            <td><button class="edit-modal btn btn-info"
                    data-info="{{$item->MATRIC}},{{$item->date}},{{$item->ENTRANCE}},{{$item->Exit}}">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                </button>
                <button class="delete-modal btn btn-danger"
                    data-info="{{$item->MATRIC}},{{$item->date}},{{$item->ENTRANCE}},{{$item->Exit}}">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button></td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
  $(document).ready(function() {
    $('#table').DataTable();
} );
 </script>