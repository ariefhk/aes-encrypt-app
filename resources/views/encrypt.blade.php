<x-app-layout title="Enkripsi">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Enkripsi</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="fw-bold">Enkripsi</h3>
        <a href="{{ route('encrypt.add') }}" class="btn btn-primary">Tambah File Enkripsi</a>
    </div>
    <div class='pt-4 row '>
        <div class="col-12 pt-5">
            <table class="table table-bordered data-table ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Ukuran</th>
                        <th>Status</th>
                        <th width="200px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        function bytesToKB(bytes) {
            return (bytes / 1024).toFixed(2);
        }

        function bytesToMB(bytes) {
            return (bytes / (1024 * 1024)).toFixed(2);
        }

        function convertToAppropriateUnit(bytes) {
            if (bytes >= 1024 && bytes < 1024 * 1024) {
                return bytesToKB(bytes) + " KB";
            } else if (bytes >= 1024 * 1024) {
                return bytesToMB(bytes) + " MB";
            } else {
                return bytes + " bytes";
            }
        }
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('encrypt.index') }}",
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 0
                }],
                order: [
                    [1, 'asc']
                ],
                columns: [{
                        data: 'id',
                        name: 'no'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'size',
                        name: 'size',
                        render: function(data, type, row) {
                            return convertToAppropriateUnit(data)
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, row) {
                            switch (data) {
                                case 'ENCRYPTED':
                                    return "Terenkripsi"
                                default:
                                    return "Tidak Diketahui"
                            }

                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            table
                .on('order.dt search.dt', function() {
                    let i = 1;

                    table
                        .cells(null, 0, {
                            search: 'applied',
                            order: 'applied'
                        })
                        .every(function(cell) {
                            this.data(i++);
                        });
                })
                .draw();

        });
    </script>
</x-app-layout>
