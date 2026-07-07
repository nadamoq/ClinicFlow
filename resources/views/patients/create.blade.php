<x-layouts.main title="Add New Patient">

    @include('patients.form',['patient'=>new app\models\Patient()])

</x-layouts.main>
