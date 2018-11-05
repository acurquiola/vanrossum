@extends('layouts.adm.app')
@extends('layouts.adm.navbar')
<div style="margin-top: -1.7%" >
    @extends('layouts.adm.sidebar')
</div>



@include('layouts.script')
<script>
    $(document).ready(function(){
        $('.collapsible').collapsible();
    });
</script>

</body>
</html>