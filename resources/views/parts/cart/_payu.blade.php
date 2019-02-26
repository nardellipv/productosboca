<script language="javascript">
    function enviarForm()
    {
        document.form.submit();
    }
</script>
<body onLoad="javascript:enviarForm();">
<form method="post" name="form" action="https://gateway.payulatam.com/ppp-web-gateway/">
    <input name="merchantId" type="hidden" value="{{ $merchantId }}">
    <input name="accountId" type="hidden" value="583246">
    <input name="description" type="hidden" value="compra producto Boca Amércia">
    <input name="referenceCode" type="hidden" value="{{ $refernceCode }}">
    <input name="amount" type="hidden" value="{{ $amount }}">
    <input name="tax" type="hidden" value="0">
    <input name="taxReturnBase" type="hidden" value="0">
    <input name="currency" type="hidden" value="{{ $currency }}">
    <input name="signature" type="hidden" value="{{ $signature }}">
    <input name="test" type="hidden" value="1">
    <input name="buyerEmail" type="hidden" value={{ $checkout->email }}>
    <input name="payerFullName" type="hidden" value={{ $checkout->name }} {{ $checkout->lastname }}>
    <input name="responseUrl" type="hidden" value="www.bocaamerica.com/thanks">
    <input name="confirmationUrl" type="hidden" value="www.bocaamerica.com/thanks">
</form>
</body>