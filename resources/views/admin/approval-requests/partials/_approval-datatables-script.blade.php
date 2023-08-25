
    <script>
        $(document).ready( function () {
            $('#approval-requests-DataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('approval-requests.index') }}',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'index'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'author',
                        name: 'author'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
        
                ],
                "order": [[ 4, 'asc']]
        
            });
        } );
    </script>