<form action="{{ route('admin.products.repositories.store',["product" => $product->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    
    {!! Form::input("type",[
    "hidden" => true
    ]) !!}


    {!! Form::input("quantity",["type" => "number","input_width" =>12]) !!}



    {!! Form::textarea("note",["input_width" => 12,"required" => false]) !!}


    {!! Form::submit() !!}
</form>