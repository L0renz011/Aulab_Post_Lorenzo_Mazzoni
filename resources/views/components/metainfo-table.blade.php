<table class="table table-striped table-hover border">
    <thead class="table-dark"">
        <tr>
            <th scape="col">#</th>
            <th scape="col">Nome del tag</th>
            <th scape="col">Q.ta articoli collegati</th>
            <th scape="col">Aggiorna</th>
            <th scape="col">Cancella</th>
        </tr>
    </thead>>
    <tbody>
        @foreach($metaInfos as $metaInfo)
        <tr>
            <th scape="row">{{$metaInfo->id}}</th>
            <td>{{$metaInfo->name}}</td>
            <td>{{count($metaInfo->articles)}}</td>
            @if($metaType == "tags")
            <td>
                <form action="{{route('admin.editTag', ['tag' => $metaInfo])}}" method="POST">
                    @csrf
                    @method('put')
                    <input type="text" name="name" placeholder="Nuovo nome del tag" class="form-control w-50 d-inline">
                    <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                </form>
            </td>
            <td>
                <form action="{{route('admin.deleteTag', ['tag' => $metaInfo])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger text-white">Elimina</button>
                </form>
            </td>
            @else
            <td>
                <form action="{{route('admin.editCategory', ['category' => $metaInfo])}}" method="POST">
                    @csrf
                    @method('put')
                    <input type="text" name="name" placeholder="Nuovo nome della categoria" class="form-control w-50 d-inline">
                    <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                </form>
            </td>
            <td>
                <form action="{{route('admin.deleteCategory', ['category' => $metaInfo])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger text-white">Elimina</button>
                </form>
            </td> 
            @endif
        </tr>
        @endforeach
    </tbody>
</table