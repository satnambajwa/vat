<div class="container">
<div class="row">
    <div class="col-sm-12 card">
        <div class="table-responsive">
            <table class="table table-bordered" id="invoices-awaiting">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Ref</th>
                        <th>To</th>
                        <th>Date</th>
                        <th>Due Date</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Status</th>
                        <th>Sent</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <script>
        $(function() {
            var invoicesDraft = $('#invoices-awaiting').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('get.data', "awaiting") !!}',
                
                columns: [
                    {
                        "data": "id",
                        "render": function(data, type, full, meta){
                            var out = data;
                            if(type === 'display'){
                                out = '<a href="/invoice/'+data+'">' + full.code + '</a>';
                            }
                            return out;
                        }
                    },
                    { data: 'reference', name: 'reference' },
                    { data: 'contact_id', name: 'contact_id' },
                    { data: 'date', name: 'date' },
                    { data: 'estimated_date', name: 'estimated_date'},
                    { data: 'sub_total', name: 'sub_total' },
                    { data: 'total', name: 'total' },
                    { data: 'status', name: 'status' }
                ]
            });


            $('#invoices-awaiting tbody').on( 'click', 'tr', function () {
                $(this).toggleClass('selected');
                console.log('dsdsds');
            } );

            $('#button').click( function () {
                alert( invoicesDraft.rows('.selected').data().length +' row(s) selected' );
            } );
        });
    </script>
    @stack('scripts')

</div>
</div>