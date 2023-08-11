<h2 class="text-primary"> Flight type simulator </h2>

<div class="mt-10">
    <p class="prose">
        Find out your flight type to calculate how many XP you will gain for your next trip. Type in your departure and arrival airports, and choose a direct or connecting flight.
        If unsure, leave it as direct. If you don't get a result, it's likely because there is no direct flight. So, select connecting flight and try again.
    </p>
    <div class="row justify-content-md-center tripList">

        <div class="col col-8">
            <div class="input-group mb-3">
                <select class="form-control" data-placeholder="Select your class" aria-describedby="basic-addon2" id="class" name="class">
                    <option></option>
                    <option value="economy">Economy</option>
                    <option value="premium">Premium Economy</option>
                    <option value="business">Business</option>
                    <option value="first">First</option>
                </select>
                <span class="input-group-text" id="basic-addon2"><i class="bi bi-layer-forward"></i></span>
            </div>
        </div>

        <div class="col col-8">
            <div class="input-group mb-3">
                <select class="codeSelect form-control" data-placeholder="Select an airport" aria-describedby="basic-addon2" id="from" name="from">
                    <option></option>
                </select>
                <span class="input-group-text" id="basic-addon2"><i class="bi bi-airplane-fill"></i></span>
            </div>
        </div>
        <div class="col col-8">
            <div class="input-group mb-3">
                <select class="codeSelect form-control" data-placeholder="Select an airport" aria-describedby="basic-addon2" id="to" name="to">
                    <option></option>
                </select>
                <span class="input-group-text" id="basic-addon2"><i class="bi bi-airplane-fill"></i></span>
            </div>
        </div>
    </div>
    <div id="errorFeedback"></div>
    <div id="feedback"></div>
    <div class="text-center">
        <a id="addLeg" href="#" class="btn btn-primary">Add a leg</a>
        <a id="calculate" href="#" class="btn btn-primary">Calculate</a>
    </div>
</div>

<div class="mt-8 overflow-x-auto">
    <table class="min-w-max table-fixed border-collapse text-center mx-auto">
        <thead>
            <tr>
                <th>
                    <img class="mx-auto" src="https://img.static-fb.com/images/media/1409B1CA-E22D-4DA2-869A5D1F9599FCBB" alt="XP logo">
                </th>
                <th class="w-40 p-2">
                    <span class="block text-xs text-primary">Domestic</span>
                    <span class="block text-xs text-primary">(within a country)</span>
                </th>
                <th class="w-40 p-2">
                    <span class="block text-xs text-primary">Medium</span>
                    <span class="block text-xs text-primary">(under 2,000 miles)</span>
                </th>
                <th class="w-40 p-2">
                    <span class="block text-xs text-primary">Long 1</span>
                    <span class="block text-xs text-primary">(between 2,000 and 3,500 miles)</span>
                </th>
                <th class="w-40 p-2">
                    <span class="block text-xs text-primary">Long 2</span>
                    <span class="block text-xs text-primary">(between 3,500 and 5,000 miles)</span>
                </th>
                <th class="w-40 p-2">
                    <span class="block text-xs text-primary">Long 3</span>
                    <span class="block text-xs text-primary">(over 5,000 miles)</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="ng-star-inserted">
                <th class="text-gray-400 p-2"> Economy </th>
                <td class=""> 2 XP </td>
                <td class=""> 5 XP </td>
                <td class=""> 8 XP </td>
                <td class=""> 10 XP </td>
                <td class=""> 12 XP </td>
            </tr>
            <tr class="ng-star-inserted">
                <th class="text-gray-400 p-2"> Premium Economy </th>
                <td class=""> 4 XP </td>
                <td class=""> 10 XP </td>
                <td class=""> 16 XP </td>
                <td class=""> 20 XP </td>
                <td class=""> 24 XP </td>
            </tr>
            <tr class="ng-star-inserted">
                <th class="text-gray-400 p-2"> Business </th>
                <td class=""> 6 XP </td>
                <td class=""> 15 XP </td>
                <td class=""> 24 XP </td>
                <td class=""> 30 XP </td>
                <td class=""> 36 XP </td>
            </tr>
            <tr class="ng-star-inserted">
                <th class="text-gray-400 p-2"> First </th>
                <td class=""> 10 XP </td>
                <td class=""> 25 XP </td>
                <td class=""> 40 XP </td>
                <td class=""> 50 XP </td>
                <td class=""> 60 XP </td>
            </tr>
        </tbody>
    </table>
</div>

<script src="./js/calculator.js?v=<?= time() ?>"></script>
