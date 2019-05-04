
@if (session()->get('status'))
<!-- Event snippet for Purchase Mobile conversion page --> <script> gtag('event', 'conversion', { 'send_to': 'AW-801041161/JVgFCLKc8JUBEInW-_0C', 'transaction_id': '' }); </script>
    <div class="alert alert-success" role="alert">
        <ul>
            <i class="fa fa fa-check-square" aria-hidden="true" style="color: green; font-size: 1.3em"></i>&nbsp;
            <span class="sr-only"></span>
            <b>{{session()->get('status')}}</b>
        </ul>
    </div>
@endif


@if (session()->get('alert'))
    <div class="alert alert-warning" role="alert">
        <ul>
            <i class="fa fa fa-exclamation-triangle" aria-hidden="true" style="color: #8a6d3b; font-size: 1.3em"></i>&nbsp;
            <span class="sr-only"></span>
            <b>{{session()->get('alert')}}</b>
        </ul>
    </div>
@endif