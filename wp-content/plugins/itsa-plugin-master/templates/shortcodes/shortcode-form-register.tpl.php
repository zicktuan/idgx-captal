<div class="relative min-h-svh">
    <div>
        <div class="px-container-mobile md:px-container-desktop my-8 md:mt-12 lg:mt-18">
            <div class="grid grid-cols-12 gap-y-3">
                <div class="col-span-12 md:col-span-7 max-w-[1000px] md:col-start-5 xl:col-start-4 xl:col-span-5">
                    <div class="flex flex-col gap-3 3xl:gap-6">
                        <h1 class="idgx-about text-serif-32 md:text-serif-40 3xl:text-serif-64">
                            APPLY NOW
                        </h1>
                        <div class="rich-text rich-text-page line-break font-mono text-mono-12">
                            <div>
                                We target at early stage startups with strong growth potential, well defined value creation opportunities, talented founders, and a sustainable competitive edge for generating recurring business success and profits.
                            </div>
                        </div>
                        <!-- Thêm form vào đây -->
                        <div class="popup-resgister-content mt-6">
                            <form id="application-form">
                                <label class="font-mono text-mono-18 font-bold">1. What’s your project’s name?</label>
                                <input type="text" name="project_name" placeholder="Your project's name" class="font-mono text-mono-12 form-input" />

                                <label class="font-mono text-mono-18 font-bold">2. What’s your email address?</label>
                                <input type="email" name="email" placeholder="example@email.com" class="font-mono text-mono-12 form-input" />
                                
                                <label class="font-mono text-mono-18 font-bold">3. How can we contact your project?</label>
                                <input type="text" name="contact" placeholder="Telegram or WhatsApp" class="font-mono text-mono-12 form-input" />

                                <label class="font-mono text-mono-18 font-bold">4. How long has your project been in operation?</label>
                                <input type="text" name="operation_time" placeholder="Input your answer" class="font-mono text-mono-12 form-input" />

                                <label class="font-mono text-mono-18 font-bold">5. How much money does the project seek to raise?</label>
                                <input type="text" name="funds" placeholder="Input your answer" class="font-mono text-mono-12 form-input" />

                                <label class="font-mono text-mono-18 font-bold">6. Link to your pitch deck</label>
                                <input type="url" name="pitch_deck" placeholder="Link your pitch deck" class="font-mono text-mono-12 form-input" />

                                <label class="font-mono text-mono-18 font-bold">7. Your project website</label>
                                <input type="url" name="website" placeholder="Your website link" class="font-mono text-mono-12 form-input" />

                                <label class="font-mono text-mono-18 font-bold">8. Describe your project</label>
                                <textarea name="description" placeholder="Describe here..." class="font-mono text-mono-12 form-input"></textarea>

                                <button type="submit" class="submit-button font-mono text-mono-18 font-bold">Submit Application</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <style>
        .popup-resgister-content h2 {
            background: linear-gradient(to right, #D7402B, #2A6EDC);
            -webkit-background-clip: text;
            color: transparent;
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 16px;
            text-align: center;
        }

        .popup-resgister-content label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
            color: #333;
            text-align: left;
            width: 100%;
        }

        .popup-resgister-content input,
        .popup-resgister-content textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 30px;
            box-sizing: border-box;
        }

        .popup-resgister-content textarea {
            min-height: 100px;
        }

        .submit-button {
            background: #D7402B;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 9999px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .form-input.error {
            border-color: red;
        }

    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('#application-form');
            const inputs = form.querySelectorAll('.form-input');

            // Reset thông báo lỗi
            function clearErrors() {
                inputs.forEach(input => input.classList.remove('error'));
            }

            function showError(inputIndex) {
                if (inputs[inputIndex]) {
                    inputs[inputIndex].classList.add('error');
                } else {
                    console.error('Input at index', inputIndex, 'is undefined');
                }
            }

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                const data = Object.fromEntries(formData.entries());
                clearErrors();

                let hasError = false;
                if (!data.project_name || !data.project_name.trim()) {
                    showError(0);
                    hasError = true;
                }

                if (!data.email || !data.email.trim()) {
                    showError(1);
                    hasError = true;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.email)) {
                    showError(1);
                    hasError = true;
                }

                if (!data.contact || !data.contact.trim()) {
                    showError(2);
                    hasError = true;
                }

                if (!data.operation_time || !data.operation_time.trim()) {
                    showError(3);
                    hasError = true;
                }

                if (!data.pitch_deck && !/^(https?:\/\/[^\s$.?#].[^\s]*)$/.test(data.pitch_deck)) {
                    showError(5);
                    hasError = true;
                }

                if (!data.website && !/^(https?:\/\/[^\s$.?#].[^\s]*)$/.test(data.website)) {
                    showError(6);
                    hasError = true;
                }

                if (hasError) return;

                fetch('/wp-admin/admin-ajax.php', {
                    method: 'POST',
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        alert('Đăng ký thành công!');
                        form.reset();
                        clearErrors();
                    } else {
                        alert('Error: ' + result.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi khi gửi dữ liệu.');
                });
                console.log(data);

            })
        })
    </script>