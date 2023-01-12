<form method="POST" action="{{ route('appointments.store') }}">
    @csrf
    <div class="mb-4">
        <label class="block font-medium text-gray-700 mb-2" for="customer_first_name">
            Customer First Name
        </label>
        <input 
            class="form-input @error('customer_first_name') border-red-500 @enderror" 
            id="customer_first_name" 
            name="customer_first_name" 
            value="{{ old('customer_first_name') }}"
            required
        >
        @error('customer_first_name')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block font-medium text-gray-700 mb-2" for="customer_last_name">
            Customer Last Name
        </label>
        <input 
            class="form-input @error('customer_last_name') border-red-500 @enderror" 
            id="customer_last_name" 
            name="customer_last_name" 
            value="{{ old('customer_last_name') }}"
            required
        >
        @error('customer_last_name')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block font-medium text-gray-700 mb-2" for="customer_email">
            Customer Email
        </label>
        <input 
            class="form-input @error('customer_email') border-red-500 @enderror" 
            type="email" 
            id="customer_email" 
            name="customer_email" 
            value="{{ old('customer_email') }}"
            required
        >
        @error('customer_email')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block font-medium text-gray-700 mb-2" for="customer_phone">
            Customer Phone
        </label>
        <input 
            class="form-input @error('customer_phone') border-red-500 @enderror" 
            type="tel" 
            id="customer_phone" 
            name="customer_phone" 
            value="{{ old('customer_phone') }}"
            required
        >
        @error('customer_phone')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block font-medium text-gray-700 mb-2" for="barber_first_name">
Barber First Name
</label>
<input 
         class="form-input @error('barber_first_name') border-red-500 @enderror" 
         type="text" 
         id="barber_first_name" 
         name="barber_first_name" 
         value="{{ old('barber_first_name') }}"
         required
     >
@error('barber_first_name')
<p class="text-red-500 text-xs italic mt-4">
{{ $message }}
</p>
@enderror
</div>
<div class="mb-4">
<label class="block font-medium text-gray-700 mb-2" for="barber_last_name">
Barber Last Name
</label>
<input 
         class="form-input @error('barber_last_name') border-red-500 @enderror" 
         type="text" 
         id="barber_last_name" 
         name="barber_last_name" 
         value="{{ old('barber_last_name') }}"
         required
     >
@error('barber_last_name')
<p class="text-red-500 text-xs italic mt-4">
{{ $message }}
</p>
@enderror
</div>
<div class="mb-4">
<label class="block font-medium text-gray-700 mb-2" for="barber_email">
Barber Email
</label>
<input 
         class="form-input @error('barber_email') border-red-500 @enderror" 
         type="email" 
         id="barber_email" 
         name="barber_email" 
         value="{{ old('barber_email') }}"
         required
     >
@error('barber_email')
<p class="text-red-500 text-xs italic mt-4">
{{ $message }}
</p>
@enderror
</div>
<div class="mb-4">
<label class="block font-medium text-gray-700 mb-2" for="barber_password">
Barber Password
</label>
<input 
         class="form-input @error('barber_password') border-red-500 @enderror" 
         type="password" 
         id="barber_password" 
         name="barber_password" 
         value="{{ old('barber_password') }}"
         required
     >
@error('barber_password')
<p class="text-red-500 text-xs italic mt-4">
{{ $message }}
</p>
@enderror
</div>
<div class="mb-4">
<label class="block font-medium text-gray-700 mb-2" for="date">
Appointment Date
</label>
<input
class="form-input @error('date') border-red-500 @enderror"
type="date"
id="date"
name="date"
value="{{ old('date') }}"
required
>
@error('date')
<p class="text-red-500 text-xs italic mt-4">
{{ $message }}
</p>
@enderror
</div>
<div class="mb-4">
<label class="block font-medium text-gray-700 mb-2" for="start_time">
Appointment Start Time
</label>
<input 
         class="form-input @error('start_time') border-red-500 @enderror" 
         type="time" 
         id="start_time" 
         name="start_time" 
         value="{{ old('start_time') }}"
         required
     >
@error('start_time')
<p class="text-red-500 text-xs italic mt-4">
{{ $message }}
</p>
@enderror
</div>
<div class="mb-4">
<label class="block font-medium text-gray-700 mb-2" for="duration">
Appointment Duration
</label>
<input 
         class="form-input @error('duration') border-red-500 @enderror" 
         type="text" 
         id="duration" 
         name="duration" 
         value="{{ old('duration') }}"
         required
     >
@error('duration')
<p class="text-red-500 text-xs italic mt-4">
{{ $message }}
</p>
@enderror
</div>
<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Create Appointment</button>
</form>