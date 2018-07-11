<script type="text/javascript">
    $(function() {
        @if ($hasAlert)
        showNotification('top', 'right')
        function showNotification(from, align){
            $.notify({
                @if($alertLevel === 'success')
                icon: "fa fa-check",
                @elseif ($alertLevel === 'warning')
                icon: "fa fa-warning",
                @elseif ($alertLevel === 'danger')
                icon: "fa fa-close",
                @else
                icon: "fa fa-exclamation",
                @endif
                message: "{{ $alertMessage }}"

            },{
                type: '{{ $alertLevel }}',
                timer: 40000,
                placement: {
                    from: from,
                    align: align
                }
            });
        }
        @endif
    });
</script>
