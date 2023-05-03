<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


.cookie
{
    position: fixed;
    z-index: 100;
    bottom: 150px;
    right: -370px;
    max-width: 345px;
    width: 100%;
    background-color: #fff;
    border-radius: 8px;
    padding: 15px 25px 22px;
    transition: right 0.3s ease;
}

.cookie.show
{
    right: 20px;
}

.cookie header
{
    display: flex;
    align-items: center;
    column-gap: 15px;
}

.cookie .data
{
    margin-top: 16px;
}

header i
{
    color: #212932;
    font-size: 36px;
}

header h2
{
    color: #212932;
    font-weight: 500;
    font-size: 22px !important;
}

.cookie .data
{
    color: #212932;
    font-size: 16px;
}

.data p a
{
    color: #000;
    text-decoration: none;
}

.data p a
{
    text-decoration: underline;

}

.cookie .cookiebutton
{
    margin-top: 16px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.cookiebutton .button
{
    width: calc(100% / 2 - 10px);
    border: none;
    color: #fff;
    cursor: pointer;
    padding: 8px 0;
    border-radius: 4px;
    background: #212932;
    transition: all 0.2s ease;
}

.cookiebutton .button:hover
{
    background-color: #212932;
}
</style>


<div class="cookie">
    <header>
        <i class="lnil lnil-cloud-check"></i>
        <h2>Cookies Conset</h2>
    </header>

    <div class="data">
        {!! trans('cookieConsent::texts.message') !!}
    </div>

    <div class="cookiebutton">
        <button class="before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-white before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto hover:text-primary before:transition-all leading-none px-[20px] py-[15px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-secondary after:rounded-md after:transition-all block js-cookie-consent-agree cookie-consent__agree">{{ trans('cookieConsent::texts.agree') }}</button>
    </div>
</div>


@push('script')
<script>
const cookieBox = document.querySelector(".cookie"),
    buttons = document.querySelectorAll(".cookiebutton");

const executeCodes = () => {
    if (document.cookie.includes("codinglab")) return;
    cookieBox.classList.add("show");

    buttons.forEach((button) => {
        button.addEventListener("click", () =>{
            cookieBox.classList.remove("show");

            if (button.id == "acceptBtn") {

              document.cookie = "cookieBy= codinglab; max-age=" + 60 * 60 * 24 * 30;
          }
        });
    });
};

window.addEventListener("load", executeCodes);
</script>
@endpush
