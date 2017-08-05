<div class="view-content">
 <div id="memberships">
    <div class="form-item">
        {strip}
        <table>
        <tr class="columnheader">
            <th>{ts}Start Date{/ts}</th>
            <th>{ts}End Date{/ts}</th>
            <th></th>
        </tr>
        {foreach from=$values item=activeMember}
        <tr class="{cycle values="odd-row,even-row"}">
          <td>{$activeMember.start_date|crmDate}</td>
          <td>{$activeMember.end_date|crmDate}</td>
        </tr>
        {/foreach}
        </table>
        {/strip}

    </div>
</div>
</div>