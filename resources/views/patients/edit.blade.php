
<x-layouts.main title="update patient">

    @include('patients.form',['action'=>route('dashboard.patients.update',$patient),'method'=>'PUT','patient'=>$patient])

</x-layouts.main>