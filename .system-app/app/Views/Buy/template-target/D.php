													<div class="col-md-4 col-6 margin-none-m">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control py-3 text-center" placeholder="User ID" autocomplete="off" name="target[]" id="id">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-6 margin-none-m">
                                                        <div class="form-group">
                                                            <select name="target[]" class="form-control py-3 text-center" id="server">
                                                                <option value="">Pilih Server</option>
                                                                <option value="500001">MiskaTown (NA)</option>
                                                                <option value="500002">SandCastle (NA)</option>
                                                                <option value="500003">MouthSwamp (NA)</option>
                                                                <option value="500004">RedwoodTown (NA)</option>
                                                                <option value="500005">Obelisk (NA)</option>
                                                                <option value="510001">FallForest (AU)</option>
                                                                <option value="510002">MountSnow (AU)</option>
                                                                <option value="520001">NancyCity (SEA)</option>
                                                                <option value="520002">CharlesTown (SEA)</option>
                                                                <option value="520003">SnowHighlands (SEA)</option>
                                                                <option value="520004">Santopany (SEA)</option>
                                                                <option value="520005">LevinCity (SEA)</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <?php if ($games['validasi_status'] == 'Y'): ?>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-primary py-3 w-100" id="btn-cek" onclick="cek_target();" type="button">Cek</button>
                                                    </div>
                                                    <?php endif ?>