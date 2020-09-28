@if ($success)
    <div class="flex flex-row-reverse justify-between mb-5 bg-green-600 text-green-100 px-4 py-3 rounded-lg">
        <a href="#" class="close" aria-label="close">&times;</a>
        <p><i class="fas fa-check mr-2 bg-green-800 p-1 rounded-full"></i> {{ $success }}</p>
    </div>
@endif

@if ($error)
    <div class="flex flex-row-reverse justify-between mb-5 bg-red-600 text-red-100 px-4 py-3 rounded-lg">
        <a href="#" class="close" aria-label="close">&times;</a>
        <p><i class="fas fa-exclamation-circle mr-2 bg-red-800 p-1 rounded-full"></i> {{ $error }}</p>
    </div>
@endif
