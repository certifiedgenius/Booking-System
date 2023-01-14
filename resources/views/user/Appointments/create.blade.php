<!-- CSS file Script -->
@vite(['resources/css/app.css', 'resources/js/app.js'])


<section class="md:container md:mx-auto body-font">
	<div class="container relative items-center w-full py-6 mx-auto md:px-12 lg:px-24 max-w-full">


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
                    Barber
                </label>
                    <select name="barber_id" id="barber_id" class="form-input" required>
                        <option value="">Select a Barber</option>
                        @foreach($barbers as $barber)
                            <option value="{{$barber->id}}">{{$barber->first_name.' '.$barber->last_name}}</option>
                        @endforeach
                    </select>
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
                <label class="block font-medium text-gray-700 mb-2" for="text">
                    Appointment Description
                </label>
                    <textarea class="form-input @error('text') border-red-500 @enderror" 
                        id="text" 
                        name="text" 
                        value="{{ old('text') }}"
                        rows="5"
                        >
                    </textarea>
            @error('text')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
            @enderror
            </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Create Appointment</button>
        </form>
    </div>
</div>