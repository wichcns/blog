@extends('layouts.app');
@section('title', 'Content CRUD')
@section('content')
    <h1>Content</h1>
    <div class="mb-2">
        <a href="{{ url('content/create') }}" role="button" class="btn btn-sm btn-success">Create Content</a>
    </div>
    <table id="tbContent" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>หัวข้อ</th>
                <th>TAG</th>
                <th>ผู้เขียน</th>
                <th>วันที่สร้าง</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content)
                <tr>
                    <td>{{ $content->id }}</td>
                    <td>{{ $content->topic }}</td>
                    <td>{{ $content->tags }}</td>
                    <td>{{ $content->user->name }}</td>
                    <td>{{ $content->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ url("content/{$content->id}/edit") }}" role="button"
                            class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger delete-item"
                            data-id = "{{ $content->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $contents->links() }}
@endsection
@push('script')
    <script>
        document.querySelector('#tbContent').addEventListener('click', (e) => {
            if (e.target.matches('.delete-item')) {
                console.log(e.target.dataset.id);
                Swal.fire({
                    title: "แน่ใจว่าจะลบข้อมูลนี้หรือไม่",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#35BE01",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete($url + '/content/' + e.target.dataset.id).then((response) => {
                            Swal.fire({
                                title: "ลบสำเร็จ",
                                text:  "ข้อมูลของคุณถูกลบแล้ว.",
                                icon:  "success"
                        });
                            setTimeout(() => {
                                window.location.href = $url + '/content';
                            }, 2000);
                        });
                    }
                });
            }
        });
    </script>
@endpush('script')
