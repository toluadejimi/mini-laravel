{{-- VTU panels: wallet + /api/vtu/* --}}

<section class="dash-panel" id="panel-airtime" hidden data-panel-id="airtime">
  <div class="vtu-shell">
    <div class="vtu-hero">
      <div class="vtu-hero-icon" aria-hidden="true"><i class="fa-solid fa-mobile-screen"></i></div>
      <div>
        <h2>Airtime</h2>
      </div>
    </div>
    <form class="vtu-form" id="formVtuAirtime">
      <div class="vtu-grid2">
        <div class="vtu-field">
          <label for="vtuAirtimeNetwork">Network</label>
          <select id="vtuAirtimeNetwork" required>
            <option value="mtn">MTN</option>
            <option value="airtel">Airtel</option>
            <option value="glo">Glo</option>
            <option value="9mobile">9mobile</option>
          </select>
        </div>
        <div class="vtu-field">
          <label for="vtuAirtimePhone">Phone number</label>
          <input id="vtuAirtimePhone" type="tel" inputmode="numeric" placeholder="0801 234 5678" required autocomplete="tel" maxlength="15" />
        </div>
      </div>
      <div class="vtu-field">
        <label for="vtuAirtimeAmount">Amount (₦)</label>
        <input id="vtuAirtimeAmount" type="number" inputmode="numeric" min="50" step="1" placeholder="500" required />
      </div>
      <div class="vtu-actions">
        <button type="submit" class="vtu-btn vtu-btn--primary" id="btnVtuAirtime"><i class="fa-solid fa-bolt"></i> Buy airtime</button>
      </div>
      <div id="vtuAirtimeResult" class="vtu-result" style="display:none;" role="status"></div>
    </form>
  </div>
</section>

<section class="dash-panel" id="panel-data" hidden data-panel-id="data">
  <div class="vtu-shell">
    <div class="vtu-hero">
      <div class="vtu-hero-icon" aria-hidden="true"><i class="fa-solid fa-wifi"></i></div>
      <div>
        <h2>Data bundles</h2>
      </div>
    </div>
    <form class="vtu-form" id="formVtuData">
      <input type="hidden" id="vtuDataServiceId" value="" />
      <div class="vtu-grid2">
        <div class="vtu-field">
          <label for="vtuDataNetwork">Network / service</label>
          <select id="vtuDataNetwork" required>
            <option value="mtn">MTN</option>
            <option value="airtel">Airtel</option>
            <option value="glo">Glo</option>
            <option value="9mobile">9mobile</option>
          </select>
        </div>
        <div class="vtu-field">
          <label for="vtuDataPhone">Phone number</label>
          <input id="vtuDataPhone" type="tel" inputmode="numeric" placeholder="0801 234 5678" required maxlength="15" />
        </div>
      </div>
      <div class="vtu-field">
        <label for="vtuDataBundle">Data bundle <span id="vtuDataBundleStatus" style="opacity:0.75;font-weight:500;"></span></label>
        <select id="vtuDataBundle">
          <option value="">— Custom (amount &amp; code below) —</option>
        </select>
      </div>
      <div class="vtu-grid2">
        <div class="vtu-field">
          <label for="vtuDataAmount">Amount (₦)</label>
          <input id="vtuDataAmount" type="number" min="50" step="1" placeholder="1000" required />
        </div>
        <div class="vtu-field">
          <label for="vtuDataPlan">Variation / plan code <span style="opacity:0.7;font-weight:500;">(optional)</span></label>
          <input id="vtuDataPlan" type="text" placeholder="Set when you pick a bundle" maxlength="120" />
        </div>
      </div>
      <div class="vtu-actions">
        <button type="submit" class="vtu-btn vtu-btn--primary" id="btnVtuData"><i class="fa-solid fa-cart-shopping"></i> Buy data</button>
      </div>
      <div id="vtuDataResult" class="vtu-result" style="display:none;" role="status"></div>
    </form>
  </div>
</section>

<section class="dash-panel" id="panel-cable-tv" hidden data-panel-id="cable-tv">
  <div class="vtu-shell">
    <div class="vtu-hero">
      <div class="vtu-hero-icon" aria-hidden="true"><i class="fa-solid fa-tv"></i></div>
      <div>
        <h2>Cable TV</h2>
        <p>Validate your smartcard or IUC, then enter the product code and amount from your provider’s bouquet list.</p>
      </div>
    </div>
    <form class="vtu-form" id="formVtuCable" onsubmit="return false;">
      <div class="vtu-grid2">
        <div class="vtu-field">
          <label for="vtuCableProvider">Provider</label>
          <select id="vtuCableProvider" required>
            <option value="dstv">DStv</option>
            <option value="gotv">GOtv</option>
            <option value="startimes">StarTimes</option>
          </select>
        </div>
        <div class="vtu-field">
          <label for="vtuCableNumber">Smartcard / IUC</label>
          <input id="vtuCableNumber" type="text" required placeholder="10–20 digits" minlength="8" maxlength="20" />
        </div>
      </div>
      <div class="vtu-actions">
        <button type="button" class="vtu-btn vtu-btn--secondary" id="btnVtuCableValidate"><i class="fa-solid fa-magnifying-glass"></i> Validate</button>
      </div>
      <div class="vtu-divider"></div>
      <div class="vtu-field">
        <label for="vtuCableProduct">Product code</label>
        <input id="vtuCableProduct" type="text" required placeholder="From bouquet list" maxlength="120" />
      </div>
      <div class="vtu-field">
        <label for="vtuCableAmount">Amount (₦)</label>
        <input id="vtuCableAmount" type="number" min="100" step="1" placeholder="2500" required />
      </div>
      <div class="vtu-actions">
        <button type="button" class="vtu-btn vtu-btn--primary" id="btnVtuCableBuy"><i class="fa-solid fa-lock"></i> Pay subscription</button>
      </div>
      <div id="vtuCableResult" class="vtu-result" style="display:none;" role="status"></div>
    </form>
  </div>
</section>

<section class="dash-panel" id="panel-electricity" hidden data-panel-id="electricity">
  <div class="vtu-shell">
    <div class="vtu-hero">
      <div class="vtu-hero-icon" aria-hidden="true"><i class="fa-solid fa-bolt"></i></div>
      <div>
        <h2>Electricity</h2>
        <p>Verify your meter, then pay for units or postpaid bills.</p>
      </div>
    </div>
    <form class="vtu-form" id="formVtuElectricity" onsubmit="return false;">
      <div class="vtu-field">
        <label for="vtuElectricityDisco">Disco code</label>
        <input id="vtuElectricityDisco" type="text" required placeholder="e.g. IKEDC" maxlength="40" />
      </div>
      <div class="vtu-grid2">
        <div class="vtu-field">
          <label for="vtuElectricityMeterType">Meter type</label>
          <select id="vtuElectricityMeterType" required>
            <option value="prepaid">Prepaid</option>
            <option value="postpaid">Postpaid</option>
          </select>
        </div>
        <div class="vtu-field">
          <label for="vtuElectricityMeter">Meter number</label>
          <input id="vtuElectricityMeter" type="text" required placeholder="Meter number" minlength="6" maxlength="20" />
        </div>
      </div>
      <div class="vtu-actions">
        <button type="button" class="vtu-btn vtu-btn--secondary" id="btnVtuElectricityValidate"><i class="fa-solid fa-magnifying-glass"></i> Verify meter</button>
      </div>
      <div class="vtu-divider"></div>
      <div class="vtu-field">
        <label for="vtuElectricityAmount">Amount (₦)</label>
        <input id="vtuElectricityAmount" type="number" min="100" step="1" placeholder="5000" required />
      </div>
      <div class="vtu-actions">
        <button type="button" class="vtu-btn vtu-btn--primary" id="btnVtuElectricityBuy"><i class="fa-solid fa-bolt"></i> Pay bill</button>
      </div>
      <div id="vtuElectricityResult" class="vtu-result" style="display:none;" role="status"></div>
    </form>
  </div>
</section>
