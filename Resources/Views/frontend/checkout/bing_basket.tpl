{if $paulBingTrackingUETID && ($sOrderNumber || $sTransactionumber)}
    {if $sAmountWithTax}
        {assign var="sRealAmount" value=$sAmountWithTax|replace:",":"."}
    {else}
        {assign var="sRealAmount" value=$sAmount|replace:",":"."}
    {/if}
    <script>
        {literal}
            window.uetq = window.uetq || [];
            window.uetq.push({  'gv': {/literal}{$sRealAmount}{literal}});
        {/literal}
    </script>
{/if}
