<style>
    footer {
        display: flex;
        flex-direction: column;
    }

    .footer-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding-top: 25px;
        padding-bottom: 15px;
    }

    .footer-links a {
        margin: 0 10px;
        text-decoration: none;
        color: white;
    }

    @media (max-width: 767px) {
        .footer-links {
            flex-direction: column;
            text-align: center;
        }

        .footer-links a {
            margin: 5px 0;
        }
    }
</style>

<footer class="text-center" style="background: rgb(34, 34, 34); color: white; padding-top: 40px;">

    <div class="col-md-5 mx-auto mb-3">
        <form class="d-flex flex-column align-items-start" action="{{ url('/storeMessage') }}" method="POST">
            @csrf
            <div class="d-flex flex-column w-100 gap-2">
                <div class="flex-grow-1 text-center">
                    <h5>Reach Us</h5>
                    <p>Leave Us A Message</p>
                    <textarea type="text" class="form-control mx-auto" name="message" style="height: 100px; width: 90%;" autocomplete="off" required></textarea>
                </div>
                <button class="btn btn-sm align-self-end" type="submit" style="font-size: 12px; color: white;">
                    Send <i class="bi bi-send"></i>
                </button>
            </div>
        </form>
    </div>


    <div class="footer-links">
        <p class="m-0 text-white">© 2023 Make It Memories</p>
        <span class="mx-2 text-white">|</span>
        <a href="#" class="mx-2 text-white" style="text-decoration: none;">Why Choose Us</a>
        <span class="mx-2 text-white">|</span>
        <a href="#" class="mx-2 text-white" style="text-decoration: none;">Testimonials</a>
        <span class="mx-2 text-white">|</span>
        <a href="#" class="mx-2 text-white" style="text-decoration: none;">Help</a>
        <span class="mx-2 text-white">|</span>
        <a href="#" class="mx-2 text-white" style="text-decoration: none;">Terms & Conditions</a>
    </div>
</footer>
