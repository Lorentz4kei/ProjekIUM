<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rental Contract - {{ $tenant->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body { background-color: white; }
            .no-print { display: none; }
            .print-container { box-shadow: none; max-width: 100%; padding: 0; margin: 0; }
        }
        body { font-family: 'Roboto', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 py-10">

    <div class="max-w-4xl mx-auto mb-6 no-print text-right">
        <button onclick="window.print()" class="bg-[#30BF62] text-white px-6 py-2 rounded-xl hover:bg-[#188C4A] transition shadow-md font-bold text-sm">
            Print / Download PDF
        </button>
    </div>

    <!-- A4 Paper Concept -->
    <div class="max-w-4xl mx-auto bg-white p-12 sm:p-20 shadow-lg print-container min-h-[1122px] relative text-gray-800">
        
        <div class="text-center mb-10 border-b-2 border-[#012619] pb-6">
            <h1 class="text-2xl font-bold uppercase tracking-wider text-[#012619]">e-Kost Management</h1>
            <p class="text-sm mt-1">Mapple Street No. 4, City Center | Phone: +62 811 0000 1111</p>
        </div>

        <h2 class="text-xl font-bold text-center underline uppercase mb-8">Room Rental Agreement</h2>

        <p class="text-justify mb-4 leading-relaxed">
        This Room Rental Agreement (the "Agreement") is made and entered into on this
        <strong>{{ $tenant->start_date->format('jS \d\a\y \o\f F, Y') }}</strong>, by and between:
        </p>

        <div class="mb-6 pl-4 space-y-2">
            <p><strong>1. Landlord:</strong> e-Kost Management Representative.</p>
            <p><strong>2. Tenant:</strong> {{ $tenant->name }} (ID: {{ $tenant->nik }}), residing at
                {{ $tenant->emergency_contact ?? '-' }}.</p>
        </div>

        <p class="text-justify mb-4 leading-relaxed">
            The Landlord and Tenant hereby agree to the following terms and conditions:
        </p>

        <h3 class="font-bold text-lg mt-6 mb-2">1. The Premises</h3>
        <p class="text-justify mb-4 leading-relaxed pl-4">
            The Landlord agrees to rent to the Tenant the room known as <strong>Room {{ $tenant->room->room_number }}
                ({{ $tenant->room->type }})</strong> located at Mapple Street No. 4.
        </p>

        <h3 class="font-bold text-lg mt-6 mb-2">2. Term of Lease</h3>
        <p class="text-justify mb-4 leading-relaxed pl-4">
            The lease shall commence on <strong>{{ $tenant->start_date->format('d/m/Y') }}</strong> and end on
            <strong>{{ $tenant->end_date->format('d/m/Y') }}</strong> (Duration: {{ $tenant->duration }} Months).
        </p>

        <h3 class="font-bold text-lg mt-6 mb-2">3. Rent and Payment</h3>
        <p class="text-justify mb-4 leading-relaxed pl-4">
            TThe Tenant agrees to pay the Landlord a monthly rent of <strong>Rp
                {{ number_format($tenant->room->price, 0, ',', '.') }}</strong>. Payment must be made by the
            {{ $tenant->start_date->format('j') }}th of every month. Initial total deposit and first month payment of Rp
            {{ number_format($tenant->room->price * 2, 0, ',', '.') }} has been received.
        </p>

        <h3 class="font-bold text-lg mt-6 mb-2">4. Terms and Conditions</h3>
        <ul class="list-disc pl-8 mb-8 space-y-1 text-justify leading-relaxed">
            <li>Tenant must maintain the cleanliness of the room and communal areas.</li>
            <li>No pets are allowed on the premises.</li>
            <li>Quiet hours are from 10:00 PM to 06:00 AM.</li>
            <li>Any damage to the property caused by the Tenant will be deducted from the security deposit.</li>
        </ul>

        <p class="text-justify mb-16 leading-relaxed">
            By signing below, the Landlord and Tenant agree to the terms and conditions outlined in this Agreement.
        </p>

        <!-- Signatures -->
        <div class="flex justify-between px-10 mt-10">
            <div class="text-center">
                <p class="mb-20"><strong>Landlord Representative</strong></p>
                <p class="underline">( ............................................. )</p>
            </div>
            <div class="text-center">
                <p class="mb-20"><strong>Tenant</strong></p>
                <p class="underline font-bold">{{ $tenant->name }}</p>
                <p class="text-sm">( ID: {{ $tenant->nik }} )</p>
            </div>
        </div>

    </div>
</body>
</html>
