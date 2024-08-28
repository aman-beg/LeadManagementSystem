<div class="filter-box">
    <label for="fiter">FilterStatus:</label>
    <select wire:model.live="filterTerm" id="status" class="form-control">
        <option value="all">All Leads</option>
        <option value="new">New</option>
        <option value="contacted">Contacted</option>
        <option value="in progress">In Progress</option>
        <option value="converted">Converted</option>
        <option value="closed">Closed</option>
    </select>
</div>
