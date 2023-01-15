<x-app-layout>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
  
  <div class="table-responsive">
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    <table class="table table-bordered table-striped table-hover datatable datatable-booking" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Customer First Name</th>
          <th>Customer Last Name</th>
          <th>Barber First Name</th>
          <th>Barber Last Name</th>
          <th>Date</th>
          <th>Start Time</th>
          <th>Notes</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($appointments as $appointment)
        <tr>
          <td>{{ $appointment->customer->first_name }}</td>
          <td>{{ $appointment->customer->last_name }}</td>
          <td>{{ $appointment->barber->first_name }}</td>
          <td>{{ $appointment->barber->last_name }}</td>
          <td>{{ $appointment->date }}</td>
          <td>{{ $appointment->start_time }}</td>
          <td>{{ $appointment->text }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
  </div>
</div>
</div>
</div>


</x-app-layout>