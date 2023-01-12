<x-app-layout>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
  
  <div class="table-responsive">
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    <table class="table table-bordered table-striped table-hover datatable datatable-booking" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Customer Name</th>
          <th>Barber</th>
          <th>Date</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Notes</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($appointments as $appointment)
        <tr>
          <td>{{ $appointment->customer->name }}</td>
          <td>{{ $appointment->barber->name }}</td>
          <td>{{ $appointment->date }}</td>
          <td>{{ $appointment->start_time }}</td>
          <td>{{ $appointment->end_time }}</td>
          <td>{{ $appointment->notes }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
  </div>
</div>
</div>
</div>


</x-app-layout>