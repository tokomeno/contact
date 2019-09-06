<div class="phone__container">
    <div class="top d-flex justify-content-between">
        <h4>
            Phonebook
        </h4>
        <div class="top__button">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="main__container">
        <figure>
            {{-- <img src="https://www.pngfind.com/pngs/m/110-1102775_download-empty-profile-hd-png-download.png"> --}}
        </figure>
        <div class="contact__info">
            <div class="name" id="name">

            </div>
            <div class="phone" id="phone">

            </div>
        </div>

    </div>
    <div class="input__container d-flex">
        <div class="matches" data-toggle="modal" data-target="#exampleModal">
            <span id="matchesNumber">0</span>
            <div>Matches</div>
        </div>
        <div class="input__numbers">

        </div>
        <div class="delete__btn">
            <i class="far fa-arrow-alt-circle-left"></i>
        </div>
    </div>
    <div class="numbers__container">
        <div class="numbers__row">
            <div class="number_btn" data-num="1">
                1
                <span></span>
            </div>
            <div class="number_btn" data-num="2">
                2
                <span>ABC</span>
            </div>
            <div class="number_btn" data-num="3">
                3
                <span>DEF</span>
            </div>
        </div>
        <div class="numbers__row">

            <div class="number_btn" data-num="4">
                4
                <span>GHI</span>
            </div>
            <div class="number_btn" data-num="5">
                5
                <span>JKL</span>
            </div>
            <div class="number_btn" data-num="6">
                6
                <span>MNO</span>
            </div>
        </div>
        <div class="numbers__row">

            <div class="number_btn" data-num="7">
                7
                <span>PQRS</span>
            </div>
            <div class="number_btn" data-num="8">
                8
                <span>TUV</span>
            </div>
            <div class="number_btn" data-num="9">
                9
                <span>WXYZ</span>
            </div>
        </div>
        <div class="numbers__row">
            <div class="number_btn" data-num="*">
                *
            </div>
            <div class="number_btn" data-num="0">
                0
                <span>+</span>
            </div>
            <div class="number_btn" data-num="#">
                #
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content px-4 py-4">
            <ul class="list-group" id="full_result">
                <li class="list-group-item">
                    Toko Meno: 592
                </li>
            </ul>
        </div>
    </div>
</div>