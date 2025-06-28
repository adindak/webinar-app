@props([
    'webinarId' => null
])

<div class="card bg-white border-0 rounded-3 mb-4">
    <div class="card-body p-4">
        <form action="<?= route('questions.store', ['id' => $webinarId]) ?>" method="POST">
            @csrf
            <div class="d-flex align-items-center">
                <input type="text" class="form-control w-100 rounded" name="question" placeholder="Ketik Pertanyaanmu disini" value="">
                <button class="btn btn-primary ms-3 col" type="submit">Kirim</button>
            </div>
        </form>

        <div class="d-flex flex-column mt-3" style="gap: 8px;">
            @foreach (getQuestion($webinarId) as $item)
                <div class="card bg-white border-1 rounded-3 ps-2">
                    <div class="d-flex align-items-center my-3">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('') }}assets/images/user-1.jpg" class="rounded-circle wh-40" alt="avatar-1">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold mb-0">{{ $item->user?->fullname }}</h5>
                            <span class="text-secondary mt-2">{{ $item->question }}</span>
                            <br>
                            <span class="fs-12">{{ $item->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="#" class="btn rounded-pill" onclick="setLike('{{ $item->id }}')">
                                <i class="fs-24 {{ $item->like ? 'ri-thumb-up-fill text-primary' : 'ri-thumb-up-line' }}"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('js')
    <script>
        const setLike = (id) => {
            let url = `{{ route('questions.like', ':id') }}`.replace(':id', '{{ $webinarId }}');
            const setLike = fetch(url, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': `{{ csrf_token() }}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    question_id: id
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status == 'success') {
                        location.reload();
                    }
                });
        }
    </script>
@endpush
